<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Stack;

use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

use Filament\Support\Enums\FontWeight;
use Filament\Support\Icons\Heroicon;


class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->contentGrid([
                'md' => 2,
                'lg' => 3,
                'xl' => 4,
            ])
            ->columns([
    Stack::make([
        ImageColumn::make('profile_picture')
            ->disk('public')
            ->label('')
            ->imageHeight(180),

        TextColumn::make('user.name')
            ->label('Student Name')
            ->searchable()
            ->sortable()
            ->weight(FontWeight::Bold),

        TextColumn::make('nisn')
            ->label('NISN')
            ->searchable(),

        TextColumn::make('classroom.name')
            ->label('Classroom')
            ->searchable(),

        TextColumn::make('phone_number')
            ->label('Phone Number')
            ->searchable(),

        TextColumn::make('gender')
            ->label('Gender')
            ->badge()
            ->color(fn ($state) => match ($state) {
                'male' => 'info',
                'female' => 'success',
                default => 'gray',
                }),
            ]),
        ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),

                ActionGroup::make([
                    EditAction::make(),
                    DeleteAction::make()
                ])
               
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}