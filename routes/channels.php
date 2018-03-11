<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
