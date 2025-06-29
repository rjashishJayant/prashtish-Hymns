<?php
function getStatusLabel(string $status): string
{
    $retval = '';
    if (!empty($status)) {
        switch ($status) {
            case 'inactive':
                $retval = '<span class="bg-warning p-md-1 rounded-5 text-light label">Inactive</span>';
                break;
            case 'active':
                $retval = '<span class="bg-success p-md-1 rounded-5 text-light label">Active</span>';
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

