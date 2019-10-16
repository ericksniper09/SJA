<?php
namespace enumerations;

include_once 'BaseEnum.php';

abstract class AdminStatut extends BaseEnum {
    const STATUT_ENABLED = "Enabled";
    const STATUT_DISABLED = "Disabled";
    const STATUT_SUSPENDED = "Suspended";
}