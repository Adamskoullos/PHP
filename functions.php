<?php

function ageChecker($val){
    if($val < 18){
        return 'You are too young';
    }
    if($val >= 18 && $val < 61){
        return 'You are old enough to drink';
    }
    if($val > 60){
        return 'You probably should not drink at your age!';
    }
};