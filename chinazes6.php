<?php

class Player {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

class Team {
    public $name;
    public $coach;
    public $players;

    public function __construct($name, $coach, $players) {
        $this->name = $name;
        $this->coach = $coach;
        $this->players = $players;
    }
}

function findYoungestPlayerTeam($teams) {
    $youngestAge = PHP_INT_MAX;
    $youngestPlayer = null;
    $youngestTeam = null;

    foreach ($teams as $team) {
        foreach ($team->players as $player) {
            if ($player->age < $youngestAge) {
                $youngestAge = $player->age;
                $youngestPlayer = $player;
                $youngestTeam = $team;
            }
        }
    }

    return $youngestTeam;
}

// Создаем несколько игроков
$player1 = new Player("Игрок 1", 20);
$player2 = new Player("Игрок 2", 22);
$player3 = new Player("Игрок 3", 18);

// Создаем команды
$team1 = new Team("Команда 1", "Тренер 1", [$player1, $player2]);
$team2 = new Team("Команда 2", "Тренер 2", [$player3]);

// Составляем список команд
$teams = [$team1, $team2];

// Находим команду с самым молодым игроком
$youngestTeam = findYoungestPlayerTeam($teams);

// Выводим информацию о команде с самым молодым игроком
echo "Самый молодой игрок: " . $youngestTeam->players[0]->name . ", " . $youngestTeam->players[0]->age . " лет, " . "в команде " . $youngestTeam->name . ", тренер - " . $youngestTeam->coach . ".";

?>
