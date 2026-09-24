<?php

namespace App\Enums;

enum DoctorSpecialization: string
{
    case GENERAL_PHYSICIAN      = 'general_physician';
    case CARDIOLOGIST           = 'cardiologist';
    case DERMATOLOGIST          = 'dermatologist';
    case PEDIATRICIAN           = 'pediatrician';
    case GYNECOLOGIST           = 'gynecologist';
    case ORTHOPEDIC             = 'orthopedic';
    case NEUROLOGIST            = 'neurologist';
    case PSYCHIATRIST           = 'psychiatrist';
    case ENT_SPECIALIST         = 'ent_specialist';
    case OPHTHALMOLOGIST        = 'ophthalmologist';
    case DENTIST                = 'dentist';
    case GENERAL_SURGEON        = 'general_surgeon';
    case UROLOGIST              = 'urologist';
    case GASTROENTEROLOGIST     = 'gastroenterologist';
    case PULMONOLOGIST          = 'pulmonologist';
    case ONCOLOGIST             = 'oncologist';
    case ENDOCRINOLOGIST        = 'endocrinologist';
    case NEPHROLOGIST           = 'nephrologist';
    case RADIOLOGIST            = 'radiologist';
    case PATHOLOGIST            = 'pathologist';
    case PHYSIOTHERAPIST        = 'physiotherapist';
    case DIETITIAN_NUTRITIONIST = 'dietitian_nutritionist';
    case AYURVEDIC              = 'ayurvedic';
    case HOMEOPATHIC            = 'homeopathic';
    case OTHER                  = 'other';

    /**
     * Get human-readable label for specialization.
     */
    public function label(): string
    {
        $translationKey = 'labels.specialization_' . $this->value;
        $translated = __($translationKey);

        if ($translated !== $translationKey) {
            return $translated;
        }

        return match ($this) {
            self::GENERAL_PHYSICIAN      => 'General Physician',
            self::CARDIOLOGIST           => 'Cardiologist',
            self::DERMATOLOGIST          => 'Dermatologist',
            self::PEDIATRICIAN           => 'Pediatrician',
            self::GYNECOLOGIST           => 'Gynecologist & Obstetrician',
            self::ORTHOPEDIC             => 'Orthopedic Surgeon',
            self::NEUROLOGIST            => 'Neurologist',
            self::PSYCHIATRIST           => 'Psychiatrist',
            self::ENT_SPECIALIST         => 'ENT Specialist',
            self::OPHTHALMOLOGIST        => 'Ophthalmologist',
            self::DENTIST                => 'Dentist',
            self::GENERAL_SURGEON        => 'General Surgeon',
            self::UROLOGIST              => 'Urologist',
            self::GASTROENTEROLOGIST     => 'Gastroenterologist',
            self::PULMONOLOGIST          => 'Pulmonologist',
            self::ONCOLOGIST             => 'Oncologist',
            self::ENDOCRINOLOGIST        => 'Endocrinologist',
            self::NEPHROLOGIST           => 'Nephrologist',
            self::RADIOLOGIST            => 'Radiologist',
            self::PATHOLOGIST            => 'Pathologist',
            self::PHYSIOTHERAPIST        => 'Physiotherapist',
            self::DIETITIAN_NUTRITIONIST => 'Dietitian & Nutritionist',
            self::AYURVEDIC              => 'Ayurvedic Specialist',
            self::HOMEOPATHIC            => 'Homeopathic Specialist',
            self::OTHER                  => 'Other / General Specialist',
        };
    }

    /**
     * Return all specializations as an array of ['id' => value, 'label' => label] for dropdowns.
     */
    public static function options(): array
    {
        return collect(self::cases())
            ->map(fn($case) => [
                'id'    => $case->value,
                'label' => $case->label(),
            ])
            ->toArray();
    }
}
