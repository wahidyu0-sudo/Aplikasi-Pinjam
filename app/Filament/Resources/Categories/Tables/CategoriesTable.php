<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;

use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table

        ->contentGrid([
            'xl' => 4,
            'lg' => 3,
            'md' => 2,
        ])
            ->columns([
                Stack::make([
                    ImageColumn::make('image')
                        ->imageSize(200),
                    TextColumn::make('name')
                        ->weight('bold')
                        ->searchable(),
                ]),
                Grid::make([
                'default' => 1
                ])->schema([
                    
                    
                ]),
                
                TextColumn::make('is_active')
                    ->formatStateUsing(fn($state) => $state ? 'Active' : 'Inactive')
                    ->badge()
                    ->color(fn($state) => $state ? 'success' : 'Danger'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
