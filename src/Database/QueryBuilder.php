<?php

namespace App\Database;

use Connection;
use \PDO;
use App\src\Model\Freelancer;
use App\Model\Event;

class QueryBuilder
{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function getAll($table, $class = "StdClass", $orderBy = null) // And order by date
    {
        $query = "SELECT * FROM $table";
        if ($orderBy) {
            $query .= " ORDER BY $orderBy";
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }
    public function findById($table, $id, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id=:id");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    public function deleteById($table, $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount() == 1;
    }
    public function create($table, $attributes)
    {
        $stmt = $this->pdo->prepare("INSERT INTO $table (" .
            implode(",", array_keys($attributes)) .
            ") VALUES (:" . implode(', :', array_keys($attributes)) . ")");
        $stmt->execute($attributes);
    }
    public function update($table, $id, $attributes)
    {
        $query = "UPDATE $table SET ";
        foreach ($attributes as $key => $attribute)
            $query .= "$key=:$key,";
        $query = rtrim($query, ",");
        $query .= ' WHERE id=:id';
        $attributes['id'] = $id;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($attributes);
        return $stmt->rowCount() == 1;
    }

    // Register Freelancer Verification
    public function getFreelancerByAllFields($field, $email, $username, $phone, $nif)
    {
        $sql = "SELECT * FROM $field WHERE Email = :email OR Username = :username OR Phone = :phone OR NIF = :nif";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':nif', $nif);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    // Register Company Verification
    public function getCompanyByAllFields($field, $email, $username, $phone, $nif)
    {
        $sql = "SELECT * FROM $field WHERE Email = :email OR Name = :name OR Phone = :phone OR NIF = :nif";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $username);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':nif', $nif);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Update Company Verification
    public function checkCompanyUpdate($field, $companyId, $email, $username, $phone, $nif)
    {
        $sql = "SELECT * FROM $field WHERE (Email = :email OR Name = :name OR Phone = :phone OR NIF = :nif) AND Id != :companyId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $username);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':nif', $nif);
        $stmt->bindParam(':companyId', $companyId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    // Update Freelancer Verification
    public function checkFreelancerUpdate($field, $freelancerId, $email, $username, $phone, $nif)
    {
        $sql = "SELECT * FROM $field WHERE (Email = :email OR Username = :username OR Phone = :phone OR NIF = :nif) AND Id != :freelancerId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':nif', $nif);
        $stmt->bindParam(':freelancerId', $freelancerId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /* Login Freelancer */
    public function getFreelancer($email, $password)
    {
        $stmt = $this->pdo->prepare('SELECT Password FROM Freelancer WHERE Email = ?');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            exit();
        }

        $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($passHashed) == 0) {
            $stmt = null;
            return 'usernotfound';
            exit();
        }

        $checkPass = password_verify($password, $passHashed[0]["Password"]);

        if ($checkPass == false) {
            $stmt = null;
            return 'wrongpassword';
            exit();
        } elseif ($checkPass == true) {
            $stmt = $this->pdo->prepare('SELECT * FROM Freelancer WHERE Email = ? AND Password = ?;');

            if (!$stmt->execute(array($email, $passHashed[0]['Password']))) {
                $stmt = null;
                exit();
            }

            $freelancer = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($freelancer) == 0) {
                $stmt = null;
                return 'usernotfound';
                exit();
            }

            $_SESSION["freelancerId"] = $freelancer[0]["Id"];
            $_SESSION["freelancerUsername"] = $freelancer[0]["Username"];
            // EVERYTHING WENT OK, RETURN SUCCESS
            return 'success';
            $stmt = null;
        }
    }

    /* Login Company */
    public function getCompany($email, $password)
    {
        $stmt = $this->pdo->prepare('SELECT Password FROM Company WHERE Email = ?');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            exit();
        }

        $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($passHashed) == 0) {
            $stmt = null;
            return 'usernotfound';
            exit();
        }

        $checkPass = password_verify($password, $passHashed[0]["Password"]);

        if ($checkPass == false) {
            $stmt = null;
            return 'wrongpassword';
            exit();
        } elseif ($checkPass == true) {
            $stmt = $this->pdo->prepare('SELECT * FROM Company WHERE Email = ? AND Password = ?;');

            if (!$stmt->execute(array($email, $passHashed[0]['Password']))) {
                $stmt = null;
                exit();
            }

            $company = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($company) == 0) {
                $stmt = null;
                return 'usernotfound';
                exit();
            }

            $_SESSION["companyId"] = $company[0]["Id"];
            $_SESSION["companyName"] = $company[0]["Name"];
            // EVERYTHING WENT OK, RETURN SUCCESS
            return 'success';
            $stmt = null;
        }
    }

    public function getApplicationsByEventIdWithFreelancerName($event_id, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("
        SELECT a.*, f.Name as Freelancer_Name
        FROM `Application` a
        JOIN Freelancer f ON a.Id_Freelancer = f.Id
        WHERE a.Id_Event = :event_id
    ");
        $stmt->bindParam(':event_id', $event_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function getAcceptedApplicationsCount($event_id)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as accepted_count FROM Application WHERE Id_Event = :event_id AND State = 'Accepted'");
        $stmt->execute(['event_id' => $event_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['accepted_count'];
    }

    public function getCompanyEvents($company_id)
    {
        $stmt = $this->pdo->prepare("SELECT *, Spots - COALESCE(accepted_count, 0) AS spotsAvailable FROM (
            SELECT e.*, COUNT(a.Id) as accepted_count
            FROM Event e
            LEFT JOIN Application a ON e.Id = a.Id_Event AND a.State = 'Accepted'
            WHERE e.Id_Company = :company_id
            GROUP BY e.Id) AS event_with_count");
        $stmt->bindParam(':company_id', $company_id, PDO::PARAM_INT);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_OBJ);
        // Add applications to each event
        foreach ($events as $event) {
            $event->applications = $this->getApplicationsByEventIdWithFreelancerName($event->Id);
        }
        return $events;
    }

    public function getAppliedEventIds($freelancer_id)
    {
        $stmt = $this->pdo->prepare("SELECT Id_Event FROM Application WHERE Id_Freelancer = :freelancer_id");
        $stmt->execute(['freelancer_id' => $freelancer_id]);
        $applied_events = $stmt->fetchAll(PDO::FETCH_OBJ);

        $applied_event_ids = array_map(function ($event) {
            return $event->Id_Event;
        }, $applied_events);

        return $applied_event_ids;
    }

    public function getApplicationsByEventId($event_id, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Application WHERE Id_Event = :event_id");
        $stmt->bindParam(':event_id', $event_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function getCompanyEventsWithApplications($company_id, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare('SELECT Event.* FROM Event WHERE Id_Company = :company_id');
        $stmt->execute(['company_id' => $company_id]);
        $events = $stmt->fetchAll(PDO::FETCH_CLASS, $class);
        foreach ($events as $event) {
            $event->applications = $this->getApplicationsByEventId($event->Id);
        }
        return $events;
    }

    public function getEventsWithCompanies($ASC, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Event ORDER BY {$ASC}");
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_CLASS, $class);
        foreach ($events as $event) {
            $event->company = $this->findById('Company', $event->Id_Company, \App\Model\Company::class);
        }
        return $events;
    }

    public function getAcceptedApplicationsCountForAllEvents()
    {
        $stmt = $this->pdo->prepare("SELECT Id_Event, COUNT(*) as count FROM Application WHERE State = 'Accepted' GROUP BY Id_Event");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $events_with_accepted_applications_count = [];
        foreach ($rows as $row) {
            $events_with_accepted_applications_count[$row['Id_Event']] = $row['count'];
        }
        return $events_with_accepted_applications_count;
    }

    public function updateApplicationState($application_id, $state)
    {
        $stmt = $this->pdo->prepare("UPDATE Application SET State = :state WHERE Id = :application_id");
        $stmt->execute([
            'state' => $state,
            'application_id' => $application_id
        ]);
        // If application state = 'Accepted', decrement the available spots for the event
        if ($state === 'Accepted') {
            $application = $this->findById('Application', $application_id);
            $this->decrementSpots($application->Id_Event);
        }
    }

    // Get the number of spots on an event
    public function decrementSpots($event_id)
    {
        $stmt = $this->pdo->prepare("UPDATE Event SET Spots = Spots - 1 WHERE Id = :event_id");
        $stmt->execute(['event_id' => $event_id]);
    }

    public function getApplicationsByEventIdAndState($event_id, $state, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("
        SELECT a.*, f.Name as Freelancer_Name, f.Username as Freelancer_Username, f.Email as Freelancer_Email
        FROM `Application` a
        JOIN Freelancer f ON a.Id_Freelancer = f.Id
        WHERE a.Id_Event = :event_id AND a.State = :state
    ");
        $stmt->bindParam(':event_id', $event_id);
        $stmt->bindParam(':state', $state);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function getAcceptedEventsForFreelancer($freelancer_id)
    {
        $sql = "SELECT e.* FROM Event e
                JOIN Application a ON e.Id = a.Id_Event
                WHERE a.Id_Freelancer = :freelancer_id AND a.State = 'accepted'";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':freelancer_id', $freelancer_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'App\Model\Event');
    }

    public function eventNameExists($eventName)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Event WHERE Name = :eventName");
        $stmt->bindParam(':eventName', $eventName);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function deleteApplicationsByEventId($eventId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM Application WHERE Id_Event = :eventId");
        $stmt->bindParam(':eventId', $eventId);
        $stmt->execute();
    }

    public function searchBySearchTerm($table, $columnName, $searchTerm, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $columnName LIKE :searchTerm");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute(['searchTerm' => "%$searchTerm%"]);
        return $stmt->fetchAll();
    }
}
