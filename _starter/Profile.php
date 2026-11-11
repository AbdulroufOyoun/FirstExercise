<?php

namespace App\Models;

class Profile
{

    
    //this helper method returns The JSON file where all profiles are stored
    private static function file(): string
    {
        return storage_path('app/profiles.json');
    }
    // this helper method Write the list of profiles (php variable) back to the JSON file (storage)
    private static function save(array $profiles): void
    {
        file_put_contents(
            self::file(),
            json_encode(array_values($profiles), JSON_PRETTY_PRINT)
        );
    }


    // Read every profile from the file(storage)
    public static function all(): array
    {
        if (!file_exists(self::file())) {
            return [];
        }

        return json_decode(file_get_contents(self::file()), true) ?? [];
    }

    
    // Find one profile by id (returns null if not found)
    public static function find(int $id): ?array
    {
        // YOUR CODE HERE
    }

    // Add a new profile
    public static function create(array $data): array
    {
        /*
        we will do the following:
            1. get all the profiles from storage into our application.
            2. get the highest existing id from current data we got in step 1.
            3. create a new profile with the correct id and the data of the request body.
            4. appending the newly created profile to the existing list of profiles.
            5. storing the updated list of profiles on storage (which is a json file in our case).
            6. reutrning the $profile we created to the controller.
        */

        // self::all() is similar to this.all() in java.
        $profiles = self::all();

        // next id = highest existing id + 1
        $lastId = count($profiles) ? max(array_column($profiles, 'id')) : 0;

        //
        $profile = [
            'id'                  => $lastId + 1,
            'first_name'          => $data['first_name'],
            'last_name'           => $data['last_name'],
            'followers'           => $data['followers'] ?? 0,
            'is_account_verified' => $data['is_account_verified'] ?? false,
        ];

        //append the new profile to the current list of profiles 
        $profiles[] = $profile;

        // store the updated list of profiles 
        self::save($profiles);

        return $profile;
    }

    

    // Remove a profile (returns false if not found)
    public static function delete(int $id): bool
    {
        /*
       WE will do the following:
            1.try to find the profile the client is trying to delete
            2. deleted from storage if found.
            3. return false to the controller if not found.
       
        */
        $profiles = self::all();

        foreach ($profiles as $index => $profile) {
            if ($profile['id'] === $id) {
                unset($profiles[$index]);
                self::save($profiles);

                return true;
            }
        }

        return false;
    }


}