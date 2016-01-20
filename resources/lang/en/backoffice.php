<?php

return [

    /**
     * GENERIC WORDS
     */

    "project" => "Project",
    "manageproject" => "Manage project",
    "tiers" => "Reward tiers",
    "organisation" => "Organisation",
    "platform" => "Platform",
    "posts" => "Posts",
    "backers" => "Backers",
    "dashboard" => "Dashboard",
    "save" => "Save",
    "create" => "Create",
    "edit" => "Edit",
    "delete" => "Delete",
    "create_tier" => "Create a new tier",

    /**
     * WARNINGS
     */

    "warnings" => [
        "no_tiers" => "You have not created any tiers yet."
    ],

    /**
     * PAGE TITLES & DESCRIPTIONS
     * (for pages that already have labels defined in setup translation file)
     */

    "page" => [
        "project" => [
            "about" => "You can edit your campaign here.",
            "fields" => [
                "description" => [
                    "name" => "Description",
                    "placeholder" => "Long description here. Markdown is supported.",
                    "info" => "You can type a longer description here. This is what people see when they arrive on the project page. You can use Markdown!"
                ],
                "logo" => [
                    "name" => "Project logo",
                    "existing" => "You have already uploaded a logo. If you want to upload a new logo, you can select it below.",
                    "info" => "You can upload a project logo here."
                ],
                "embed" => [
                    "name" => "Project video embed code",
                    "placeholder" => "Paste your embed code here.",
                    "info" => "You can use embled codes from e.g. Vimeo or YouTube. Since embed codes tend to change, you can paste your own here. WARNING: The HTML you put here will be placed on the website, unsanitized."
                ],
                "banner" => [
                    "name" => "Project banner",
                    "existing" => "You have already uploaded a banner. If you want to upload a new banner, you can select it below.",
                    "info" => "You can upload a project banner here. Recommended size: 200x1000px."
                ]
            ]
        ],
        "organisation" => [
            "about" => "You can edit information about your organisation here.",
            // Please note that the field text used here is sourced from setup.php's translation file
        ],
        "platform" => [
            "about" => "You can edit your platform's configuration here."
        ],
        "tiers" => [
            "about" => "You can manage your project's pledge tiers here."
        ]
    ],

    /**
     * EDIT/NEW TIER
     */

    "edit_tier" => [
        "title" => "Edit a reward tier",
        "about" => "You can edit an existing tier here."
    ],
    "new_tier" => [
        "title" => "Create a reward tier",
        "about" => "You can create a new tier here."
    ],
    "tier_form" => [
        "value" => [
            "name" => "Minimum required contribution",
            "placeholder" => "5",
            "info" => "The minimum required contribution that must be paid before this tier is reached. Each tier requires a separate value.",
        ],
        "description" => [
            "name" => "Description",
            "placeholder" => "You can write a description here.",
            "info" => "You can write about the rewards here. You cannot use Markdown here.",
        ]
    ],
];