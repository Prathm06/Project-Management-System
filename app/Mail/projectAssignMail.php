<?php

namespace App\Mail;

use App\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class projectAssignMail extends Mailable
{
    use Queueable, SerializesModels;


    protected $project;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Project $project)
    {
        //

        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = Auth::user()->email;
        return $this->from($email)
                ->markdown('admin.emails.projectAssign')
                ->with([
                    'projectName' => $this->project->name,
                    'projectDesrciption' => $this->project->description,
                ]);
        // return $this->markdown('admin.emails.projectAssign');
    }
}
