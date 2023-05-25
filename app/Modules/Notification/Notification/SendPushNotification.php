<?php

declare(strict_types=1);

namespace App\Modules\Notification\Notification;

use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\Exceptions\CouldNotSendNotification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\AndroidConfig;
use NotificationChannels\Fcm\Resources\AndroidFcmOptions;
use NotificationChannels\Fcm\Resources\AndroidNotification;
use NotificationChannels\Fcm\Resources\ApnsConfig;
use NotificationChannels\Fcm\Resources\ApnsFcmOptions;
use NotificationChannels\Fcm\Resources\NotificationPriority;


final class SendPushNotification extends Notification
{
    public function __construct(
        private readonly string $title,
        private readonly string $body,
        private readonly ?array $data = null
    ) {
    }

    public function via($notifiable): array
    {
        return [FcmChannel::class, 'database'];
    }

    /**
     * @throws CouldNotSendNotification
     */
    public function toFcm(): FcmMessage
    {
        return FcmMessage::create()
            ->setData($this->data)
            ->setNotification(\NotificationChannels\Fcm\Resources\Notification::create()
                ->setTitle($this->title)
                ->setBody($this->body))
            ->setAndroid(
                AndroidConfig::create()
                    ->setFcmOptions(AndroidFcmOptions::create()->setAnalyticsLabel('analytics'))
                    ->setNotification(AndroidNotification::create()
                        ->setSound('default')
                        ->setColor('#0A0A0A')
                        ->setNotificationPriority(NotificationPriority::PRIORITY_HIGH()))
            )->setApns(
                ApnsConfig::create()
                    ->setFcmOptions(ApnsFcmOptions::create()->setAnalyticsLabel('analytics_ios'))
                    ->setPayload(['aps' => ['sound' => 'default']])
            );
    }

    public function toArray($notifiable): array
    {
        return [
            'title'   => $this->title,
            'body'    => $this->body,
            'data'    => $this->data
        ];
    }

    public function fcmProject(): string
    {
        return 'app';
    }

}
