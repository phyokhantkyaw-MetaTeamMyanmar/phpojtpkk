<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PostImport implements ToCollection, WithValidation, WithHeadingRow
{
    /** 
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    use Importable;

    public function collection(SupportCollection $rows)
    {
        // Validator::make($rows->toArray(), [
        //     '*.title' => ['required', 'max:50', 'unique:posts,title'],
        //     '*.description' => ['required'],
        // ])->validate();

        foreach ($rows as $row) {
            Post::create([
                'title' => $row['title'],
                'description' => $row['description'],
                'status' => 1,
                'created_user_id' => Auth::user()->id,
                'updated_user_id' => Auth::user()->id,
            ]);
        }
    }
    public function rules(): array
    {
        return [
            '*.title' => ['required', 'max:50', 'unique:posts,title'],
            '*.description' => ['required'],
        ];
    }
    // public function model(array $row)
    // {
    //     return new Post([
    //         'title'     => $row['title'],
    //         'description'    => $row['description'],
    //         'status' => 1,
    //         'created_user_id' => Auth::user()->id,
    //         'updated_user_id' => Auth::user()->id,
    //     ]);
    // }
}
