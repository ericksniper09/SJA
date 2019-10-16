<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace enumerations;

include_once 'BaseEnum.php';

/**
 * Description of FirstAiderStatut
 *
 * @author ericd
 */
abstract class FirstAiderStatut extends BaseEnum {
    const STATUT_ACTIVE = "Active";
    const STATUT_DORMANT = "Dormant";
    const STATUT_RESIGNED = "Resigned";
    const STATUT_RETIRED = "Retired";
}
