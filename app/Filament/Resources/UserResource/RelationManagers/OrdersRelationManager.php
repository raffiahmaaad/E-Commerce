<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
            TextColumn::make('id')
                ->label('Order ID')
                ->searchable(),

            TextColumn::make('status')
            ->badge()
            ->color(fn (string $state): string => match ($state) {
                'new' => 'info',
                'processing' => 'warning',
                'shipped' => 'success',
                'delivered' => 'success',
                'cancelled' => 'danger'
            })
            ->icon(fn (string $state): string => match ($state) {
                'new' => 'heroicon-m-sparkles',
                'processing' => 'heroicon-m-arrow-path',
                'shipped' => 'heroicon-m-truck',
                'delivered' => 'heroicon-m-check-badge',
                'cancelled' => 'heroicon-m-x-circle'
            }),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
