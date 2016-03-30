<?php

namespace Yams\Services;

interface Combinaison {
    public function setGame(array $game);
    public function validate();
    public function getPoints();
    public function getName();
}
