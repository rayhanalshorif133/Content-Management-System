<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscriberConfirmation()
    {
        $phone = $this->get_msisdn();

        $isSubscriber = Subscriber::select()
            ->where('msisdn', $this->get_msisdn())
            ->where('status', 1)
            ->first();
        if ($isSubscriber) {
            $this->flashMessageSuccess('You are already subscribed');
            return redirect()->route('home');
        }

        return view('web.subscriber.confirmation', compact('phone'));
    }

    public function subscriberConfirmed()
    {
        $isSubscriber = Subscriber::where('msisdn', $this->get_msisdn())->first();
        if ($isSubscriber) {
            if ($isSubscriber->status == 1) {
                $this->flashMessageSuccess('You are already subscribed');
                return redirect()->route('home');
            } else {
                $isSubscriber->update([
                    'status' => 1,
                    'modified' => now()->format('Y-m-d H:i:s'),
                ]);
            }
        } else {
            Subscriber::create([
                'msisdn' => $this->get_msisdn(),
                'opr' => $this->get_opr(),
                'status' => 1,
                'created' => now()->format('Y-m-d H:i:s'),
                'modified' => now()->format('Y-m-d H:i:s'),
            ]);
        }
        return view('web.subscriber.confirmed');
    }

    public function subscriberCancelConfirmation()
    {
        $phone = $this->get_msisdn();

        $isSubscriber = Subscriber::select()
            ->where('msisdn', $this->get_msisdn())
            ->where('status', 0)
            ->first();
        if ($isSubscriber) {
            $this->flashMessageSuccess('You are already unsubscribed');
            return redirect()->route('home');
        }

        return view('web.cancel-subscriber.confirmation', compact('phone'));
    }

    public function subscriberCancelConfirmed()
    {
        $isSubscriber = Subscriber::select()
            ->where('msisdn', $this->get_msisdn())
            ->first();
        if ($isSubscriber) {
            $isSubscriber->update([
                'status' => 0,
                'modified' => now()->format('Y-m-d H:i:s'),
            ]);
        }
        $this->flashMessageSuccess('You are unsubscribed');
        return view('web.cancel-subscriber.confirmed');
    }
}
