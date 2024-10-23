<?php

namespace App\Filament\Jamaah\Resources;

use App\Filament\Jamaah\Resources\UserResource\Pages;
use App\Filament\Jamaah\Resources\UserResource\RelationManagers;
use App\Models\Role;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $roles = Role::where("name", "!=", "superman")->get()->pluck("name");

        return $form
            ->schema([
                Select::make("user_id")
                    ->label("User")
                    ->options(
                        User::whereNotIn('id', function ($query) {
                            $query->select('user_id')
                                ->from('jamaah_user')
                                ->where('jamaah_id', Filament::getTenant()->id);
                        })
                            ->pluck("name", "id")
                    )
                    ->lazy()
                    ->searchable()
                    ->required(),
                Select::make("role")
                    ->label("Role")
                    ->options($roles)
                    ->default($roles[0])
                    ->selectablePlaceholder(false)
                    ->required(),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->searchable(),
                ViewColumn::make('roles.name')->view("tables.columns.user-roles-column")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->recordUrl(null)
            ->bulkActions([]);
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
