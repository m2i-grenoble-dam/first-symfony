<?php

namespace App\Repository;
use App\Entity\Course;
use DateTime;


class CourseRepository {

    /**
     * Récupère tous les cours
     * @return Course[]
     */
    public function findAll():array{

        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT * FROM course");

        $query->execute();

        foreach ( $query->fetchAll() as $line) {
            $list[] = new Course($line['title'], $line['content'], new DateTime($line['published']), $line['subject'], $line['id']);
        }
        return $list;
    }
    
    /**
     * Récupère un cours spécifique par son id
     * @param int $id l'id du cours à récupérer
     * @return Course|null une instance de Course ou null si pas de cours correspondant
     */
    public function findById(int $id):?Course{

        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT * FROM course WHERE id=:id");
        $query->bindValue(':id', $id);
        $query->execute();

        foreach ( $query->fetchAll() as $line) {
            return new Course($line['title'], $line['content'], new DateTime($line['published']), $line['subject'], $line['id']);
        }
        return null;
    }
}