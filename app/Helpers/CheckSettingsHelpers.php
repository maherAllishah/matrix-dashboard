<?php

function checkSettings()
{
    $settings = \App\Models\SettingsOfBusinessPartners::query()->get();
    if ($settings->isNotEmpty()) {
        return true;
    }
    return false;
}
