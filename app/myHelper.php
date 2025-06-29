<?php
function getStatusLabel(string $status): string
{
    $retval = '';
    if (!empty($status)) {
        switch ($status) {
            case '1':
                $retval = '<span class="status-badge badge-active d-inline-flex align-items-center">
                        <i class="fas fa-check-circle status-icon me-2"></i>
                        <span class="status-text">Active</span>
                    </span>';
                break;
            case 2:
                $retval = '<span class="status-badge badge-inactive d-inline-flex align-items-center">
                        <i class="fas fa-times-circle status-icon me-2"></i>
                        <span class="status-text">Inactive</span>
                    </span>';
                break;
        }
    }
    return $retval;
}

function getDashOnEmpty($value): string
{
    $retval = '';
    if (!empty($value)) {
        $retval = $value;
    } else {
        $retval = '-';
    }
    return $retval;
}

