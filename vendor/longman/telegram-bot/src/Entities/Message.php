<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Longman\TelegramBot\Entities;

/**
 * Class Message
 *
 * @link https://core.telegram.org/bots/api#message
 *
 * @method int      getMessageId()             Unique message identifier
 * @method User     getFrom()                  Optional. Sender, can be empty for messages sent to channels
 * @method int      getDate()                  Date the message was sent in Unix time
 * @method Chat     getChat()                  Conversation the message belongs to
 * @method User     getForwardFrom()           Optional. For forwarded messages, sender of the original message
 * @method Chat     getForwardFromChat()       Optional. For messages forwarded from a channel, information about the original channel
 * @method int      getForwardFromMessageId()  Optional. For forwarded channel posts, identifier of the original message in the channel
 * @method int      getForwardDate()           Optional. For forwarded messages, date the original message was sent in Unix time
 * @method Message  getReplyToMessage()        Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
 * @method int      getEditDate()              Optional. Date the message was last edited in Unix time
 * @method Audio    getAudio()                 Optional. Message is an audio file, information about the file
 * @method Document getDocument()              Optional. Message is a general file, information about the file
 * @method Sticker  getSticker()               Optional. Message is a sticker, information about the sticker
 * @method Video    getVideo()                 Optional. Message is a video, information about the video
 * @method Voice    getVoice()                 Optional. Message is a voice message, information about the file
 * @method string   getCaption()               Optional. Caption for the document, photo or video, 0-200 characters
 * @method Contact  getContact()               Optional. Message is a shared contact, information about the contact
 * @method Location getLocation()              Optional. Message is a shared location, information about the location
 * @method Venue    getVenue()                 Optional. Message is a venue, information about the venue
 * @method User     getNewChatMember()         Optional. A new member was added to the group, information about them (this member may be the bot itself)
 * @method User     getLeftChatMember()        Optional. A member was removed from the group, information about them (this member may be the bot itself)
 * @method string   getNewChatTitle()          Optional. A chat title was changed to this value
 * @method bool     getDeleteChatPhoto()       Optional. Service message: the chat photo was deleted
 * @method bool     getGroupChatCreated()      Optional. Service message: the group has been created
 * @method bool     getSupergroupChatCreated() Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can’t be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
 * @method bool     getChannelChatCreated()    Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can’t be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
 * @method int      getMigrateToChatId()       Optional. The group has been migrated to a supergroup with the specified identifier. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
 * @method int      getMigrateFromChatId()     Optional. The supergroup has been migrated from a group with the specified identifier. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
 * @method Message  getPinnedMessage()         Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
 */
class Message extends Entity
{
    /**
     * {@inheritdoc}
     */
    protected function subEntities()
    {
        return [
            'from'              => User::class,
            'chat'              => Chat::class,
            'forward_from'      => User::class,
            'forward_from_chat' => Chat::class,
            'reply_to_message'  => self::class,
            'entities'          => MessageEntity::class,
            'audio'             => Audio::class,
            'document'          => Document::class,
            'photo'             => PhotoSize::class,
            'sticker'           => Sticker::class,
            'video'             => Video::class,
            'voice'             => Voice::class,
            'contact'           => Contact::class,
            'location'          => Location::class,
            'venue'             => Venue::class,
            'new_chat_member'   => User::class,
            'left_chat_member'  => User::class,
            'new_chat_photo'    => PhotoSize::class,
            'pinned_message'    => Message::class,
        ];
    }

    /**
     * Message constructor
     *
     * @param array  $data
     * @param string $bot_username
     *
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */
    public function __construct(array $data, $bot_username = '')
    {
        //Retro-compatibility
        if (isset($data['new_chat_participant'])) {
            $data['new_chat_member'] = $data['new_chat_participant'];
            unset($data['new_chat_participant']);
        }
        if (isset($data['left_chat_participant'])) {
            $data['left_chat_member'] = $data['left_chat_participant'];
            unset($data['left_chat_participant']);
        }

        parent::__construct($data, $bot_username);
    }

    /**
     * Optional. Message is a photo, available sizes of the photo
     *
     * This method overrides the default getPhoto method
     * and returns a nice array of PhotoSize objects.
     *
     * @return null|PhotoSize[]
     */
    public function getPhoto()
    {
        $pretty_array = $this->makePrettyObjectArray(PhotoSize::class, 'photo');

        return empty($pretty_array) ? null : $pretty_array;
    }

    /**
     * Optional. A chat photo was changed to this value
     *
     * This method overrides the default getNewChatPhoto method
     * and returns a nice array of PhotoSize objects.
     *
     * @return null|PhotoSize[]
     */
    public function getNewChatPhoto()
    {
        $pretty_array = $this->makePrettyObjectArray(PhotoSize::class, 'new_chat_photo');

        return empty($pretty_array) ? null : $pretty_array;
    }

    /**
     * Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     *
     * This method overrides the default getEntities method
     * and returns a nice array of MessageEntity objects.
     *
     * @return null|MessageEntity[]
     */
    public function getEntities()
    {
        $pretty_array = $this->makePrettyObjectArray(MessageEntity::class, 'entities');

        return empty($pretty_array) ? null : $pretty_array;
    }

    /**
     * return the entire command like /echo or /echo@bot1 if specified
     *
     * @return string|null
     */
    public function getFullCommand()
    {
        $text = $this->getProperty('text');
        if (strpos($text, '/') === 0) {
            $no_EOL = strtok($text, PHP_EOL);
            $no_space = strtok($text, ' ');

            //try to understand which separator \n or space divide /command from text
            return strlen($no_space) < strlen($no_EOL) ? $no_space : $no_EOL;
        }

        return null;
    }

    /**
     * Get command
     *
     * @return bool|string
     */
    public function getCommand()
    {
        $command = $this->getProperty('command');
        if (!empty($command)) {
            return $command;
        }

        $full_command = $this->getFullCommand();

        if (strpos($full_command, '/') === 0) {
            $full_command = substr($full_command, 1);

            //check if command is follow by botname
            $split_cmd = explode('@', $full_command);
            if (isset($split_cmd[1])) {
                //command is followed by name check if is addressed to me
                if (strtolower($split_cmd[1]) === strtolower($this->getBotUsername())) {
                    return $split_cmd[0];
                }
            } else {
                //command is not followed by name
                return $full_command;
            }
        }

        return false;
    }

    /**
     * For text messages, the actual UTF-8 text of the message, 0-4096 characters.
     *
     * @param bool $without_cmd
     *
     * @return string
     */
    public function getText($without_cmd = false)
    {
        $text = $this->getProperty('text');

        if ($without_cmd && $command = $this->getFullCommand()) {
            if (strlen($command) + 1 < strlen($text)) {
                return substr($text, strlen($command) + 1);
            }

            return '';
        }

        return $text;
    }

    /**
     * Bot added in chat
     *
     * @return bool
     */
    public function botAddedInChat()
    {
        $member = $this->getNewChatMember();

        return $member !== null && $member->getUsername() === $this->getBotUsername();
    }

    /**
     * Detect type based on properties.
     *
     * @return string|null
     */
    public function getType()
    {
        $types = [
            'text',
            'audio',
            'document',
            'photo',
            'sticker',
            'video',
            'voice',
            'contact',
            'location',
            'venue',
            'new_chat_member',
            'left_chat_member',
            'new_chat_title',
            'new_chat_photo',
            'delete_chat_photo',
            'group_chat_created',
            'supergroup_chat_created',
            'channel_chat_created',
            'migrate_to_chat_id',
            'migrate_from_chat_id',
            'pinned_message',
        ];

        foreach ($types as $type) {
            if ($this->getProperty($type)) {
                if ($type === 'text' && $this->getCommand()) {
                    return 'command';
                }

                return $type;
            }
        }

        return 'message';
    }
}
