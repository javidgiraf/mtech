<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Mail\RequestQuotation;
use App\Models\MailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendContactMail(Request $request)
    {
        try {
            $resumePath = null;
            $fileName = null;

            if ($request->hasFile('resume')) {
                $resume = $request->file('resume');
                $fileName = time() . '_' . $resume->getClientOriginalName();
                $resume->storeAs('resumes', $fileName, 'public');
            }

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'location' => $request->location,
                'job_code' => $request->job_code,
                'message' => $request->message,
                'upload_file' => $fileName,
                'subject' => $request->subject
            ];
            
            MailRequest::create($data);

            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($data));

            return redirect()->back()->with('success', 'Mail sent successfully');
        } catch (\Exception $e) {
            
            return back()->with('error', 'Mail not sent: ' . $e->getMessage());
        }
    }
}
