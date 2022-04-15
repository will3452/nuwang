<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class ApiChatController extends Controller
{
    public function initChat(Request $request)
    {
        $data = $request->validate([
            'members' => 'required',
        ]);

        $rawArr = Arr::wrap($data['members']);

        $sortedArr = Arr::sort($rawArr);

        $givenMemberString = implode(Chat::SEPARATOR, $sortedArr);

        $isChatExists = Chat::whereMembers($givenMemberString)->exists();

        $chat = Chat::whereMembers($givenMemberString)->first();

        if (! $isChatExists) {
            $chat = Chat::create([
                'members' => $givenMemberString,
            ]);
        }

        return $chat;
    }

    public function sendMessage(Request $request, Chat $chat)
    {
        $data = $request->validate([
            'sender' => 'required',
            'messages' => 'required',
        ]);

        $message = $chat->messages()->create($data);

        return $message;
    }
}
