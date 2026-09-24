<?php

namespace App\View\Components\cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class dr_card extends Component
{
    public mixed $landingPage;
    public string $name;
    public string $role;
    public string $brand;
    public ?string $image;
    public array $tags;
    public string $profileUrl;
    public string $whatsappNumber;
    public string $shareUrl;
    public string $backTitle;
    public string $backSub;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $landingPage = null,
        ?string $name = null,
        ?string $role = null,
        ?string $brand = null,
        ?string $image = null,
        $tags = null,
        ?string $profileUrl = null,
        ?string $whatsappNumber = null,
        ?string $shareUrl = null,
        ?string $backTitle = null,
        ?string $backSub = null
    ) {
        $this->landingPage = $landingPage;

        $primaryDoctor = null;
        if ($landingPage && isset($landingPage->doctors) && count($landingPage->doctors) > 0) {
            $primaryDoctor = $landingPage->doctors->first();
        }

        // Brand
        $this->brand = $brand ?? 'Doctor<span>Shah</span>';

        // Name resolution:
        // Priority: explicit $name > $landingPage->clinic_name > primary doctor name > default
        if (!empty($name)) {
            $this->name = $name;
        } elseif ($landingPage && !empty($landingPage->clinic_name)) {
            $this->name = $landingPage->clinic_name;
        } elseif ($primaryDoctor && !empty($primaryDoctor->doctor_name)) {
            $this->name = $primaryDoctor->doctor_name;
        } else {
            $this->name = 'Simran Kaur';
        }

        // Role / Specialization resolution:
        // Priority: explicit $role > primary doctor info > fallback
        if (!empty($role)) {
            $this->role = $role;
        } elseif ($primaryDoctor) {
            $docPart = $primaryDoctor->doctor_name;
            if (!empty($primaryDoctor->specialization)) {
                $cleanSpec = trim(Str::before($primaryDoctor->specialization, '('));
                $docPart .= ' • ' . ($cleanSpec ?: $primaryDoctor->specialization);
            }
            $this->role = $docPart;
        } elseif ($landingPage) {
            $this->role = 'Multi-Speciality Clinic';
        } else {
            $this->role = 'Advocate';
        }

        // Image / Avatar resolution:
        // Priority: explicit $image > clinic logo > doctor photo > null (default SVG)
        if (!empty($image)) {
            $this->image = $image;
        } elseif ($landingPage && !empty($landingPage->logo)) {
            $this->image = asset('landing-page-logos/' . $landingPage->logo);
        } elseif ($primaryDoctor && !empty($primaryDoctor->photo)) {
            $this->image = asset('landing-page-doctors/' . $primaryDoctor->photo);
        } else {
            $this->image = null;
        }

        // Tags resolution:
        // Priority: explicit $tags (array or comma-separated) > landing page services > default tags
        if (!empty($tags)) {
            if (is_array($tags)) {
                $this->tags = array_values(array_filter($tags));
            } else {
                $this->tags = array_values(array_filter(array_map('trim', explode(',', (string)$tags))));
            }
        } elseif ($landingPage && !empty($landingPage->services)) {
            $raw = preg_replace('/<\s*(?:br|p|li)[^>]*>/i', "\n", $landingPage->services);
            $clean = strip_tags(html_entity_decode($raw, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            $lines = array_filter(array_map('trim', preg_split('/[\r\n,]+/', $clean)));

            $formattedTags = [];
            foreach ($lines as $line) {
                if (count($formattedTags) >= 3) {
                    break;
                }
                $short = Str::limit($line, 16, '');
                $formattedTags[] = $short;
            }
            $this->tags = !empty($formattedTags) ? $formattedTags : ['Healthcare', 'Consultation', 'Care'];
        } else {
            $this->tags = ['Civil', 'Criminal', 'Family'];
        }

        // Profile URL (landing page detail):
        if (!empty($profileUrl)) {
            $this->profileUrl = $profileUrl;
        } elseif ($landingPage && !empty($landingPage->slug)) {
            $this->profileUrl = url('/lp/' . $landingPage->slug);
        } else {
            $this->profileUrl = '#';
        }

        // WhatsApp Number & Share URL
        $this->whatsappNumber = $whatsappNumber ?? ($landingPage->whatsapp_number ?? '');

        if (!empty($shareUrl)) {
            $this->shareUrl = $shareUrl;
        } else {
            $shareText = 'Check out ' . $this->name . ': ' . $this->profileUrl;
            $this->shareUrl = 'https://api.whatsapp.com/send?text=' . rawurlencode($shareText);
        }

        // Back texts
        $this->backTitle = $backTitle ?? 'Connect with me';
        $this->backSub   = $backSub ?? 'Scan to view my profile and services.';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.dr_card');
    }
}
