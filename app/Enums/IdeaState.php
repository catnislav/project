<?php

namespace App\Enums;

enum IdeaState: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
}
