<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiscountResource\Pages;
use App\Filament\Resources\DiscountResource\RelationManagers;
use App\Models\Discount;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->label('Kode Diskon')
                    ->required()
                    ->maxLength(50),
                Forms\Components\Select::make('type')
                    ->options([
                        'percentage' => 'Percentage',
                        'fixed' => 'Fixed',
                    ])
                    ->label('Tipe Diskon')
                    ->live()
                    ->required(),
                Forms\Components\TextInput::make('value')
                    ->mask(RawJs::make('$money($input)'))
                    ->dehydrateStateUsing(fn($state) => (int) preg_replace('/[^0-9]/', '', $state ?? 0))
                    ->prefix(function (Get $get){ return $get('type') == 'fixed' ? 'Rp' : NULL; })
                    ->suffix(function (Get $get){ return $get('type') == 'percentage' ? '%' : NULL; })
                    ->label('Nilai Diskon')
                    ->required()   
                    ->numeric(),
                Forms\Components\TextInput::make('max_uses')
                    ->label('Maksimal Penggunaan (opsional)')
                    ->numeric(),
                Forms\Components\DateTimePicker::make('starts_at')
                ->label('Tanggal Mulai (opsional)'),
                Forms\Components\DateTimePicker::make('expires_at')
                ->label('Tanggal Berakhir (opsional)'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Kode Diskon Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('value')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_uses')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('uses')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('starts_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('expires_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDiscounts::route('/'),
            'create' => Pages\CreateDiscount::route('/create'),
            'edit' => Pages\EditDiscount::route('/{record}/edit'),
        ];
    }
}
