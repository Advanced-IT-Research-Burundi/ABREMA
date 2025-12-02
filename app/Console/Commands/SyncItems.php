<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;
use App\Models\Actualite;
use App\Models\AvisPublic;
use App\Models\Client;
use App\Models\Colis;
use App\Models\Publication;
use App\Models\TexteReglementaire;
// add other models you need here...

class SyncItems extends Command
{
    protected $signature = 'sync:items {--truncate : Remove existing items before sync}';
    protected $description = 'Sync existing models into items table (polymorphic)';

    public function handle()
    {
        if ($this->option('truncate')) {
            Item::truncate();
            $this->info('Truncated items table.');
        }

        $mappings = [
            Actualite::class => ['title' => 'title', 'description' => 'description', 'image' => 'image'],
            AvisPublic::class => ['title' => 'title', 'description' => 'description', 'alt_description' => 'contenu'],
            Publication::class => ['title' => 'title', 'description' => 'description', 'image' => 'image'],
            TexteReglementaire::class => ['title' => 'title', 'description' => 'pathfile'],
            Client::class => ['title' => 'name', 'description' => 'description', 'image' => 'image'],
            Colis::class => ['title' => 'nom_prenom', 'description' => 'message', 'alt_description' => 'email'],
            // // add other model mapping arrays here...
        ];

        foreach ($mappings as $modelClass => $fields) {
            $this->info("Syncing: {$modelClass}");
            $modelClass::chunk(100, function ($rows) use ($modelClass, $fields) {
                foreach ($rows as $row) {
                    $title = $this->fetchField($row, $fields['title'] ?? null);
                    $description = $this->fetchField($row, $fields['description'] ?? ($fields['alt_description'] ?? null));
                    $image = $this->fetchField($row, $fields['image'] ?? null);

                    Item::updateOrCreate(
                        [
                            'itemable_type' => $modelClass,
                            'itemable_id' => $row->id,
                        ],
                        [
                            'title' => $title ?? ('#' . $modelClass . ' #' . $row->id),
                            'description' => $description,
                            'image' => $image,
                        ]
                    );
                }
            });
        }

        $this->info('Sync completed.');
        return 0;
    }

    protected function fetchField($model, $attr)
    {
        if (!$attr) return null;
        // support dot notation if needed in future
        return $model->{$attr} ?? null;
    }
}
