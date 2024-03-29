<?php

namespace enumerations;

include_once 'BaseEnum.php';

abstract class FirstAidLevel extends BaseEnum {
    const LEVEL_FULL  = "Full First Aid";
    const LEVEL_ESSENTIAL = "Essential First Aid";
    const LEVEL_BASIC = "Basic First Aid";
    const LEVEL_WORK = "First Aid at Work";
}