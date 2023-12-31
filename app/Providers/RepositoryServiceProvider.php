<?php

namespace App\Providers;

use App\Interface\Sections\SectionRepositoryInterface;
use App\Repository\Sections\SectionRepository;

use App\Interface\Doctors\DoctorRepositoryInterface;
use App\Repository\Doctors\DoctorRepository;

use App\Repository\Services\SingleServieRepository;
use App\Interface\Services\SingleServieRepositoryInterface;

use App\Repository\Ambulances\AmbulanceRepository;
use App\Interface\Ambulances\AmbulanceRepositoryInterface;

use App\Repository\insurances\InsuranceRepository;
use App\Interface\insurances\InsuranceRepositoryInterface;

use App\Repository\Patients\PatientRepository;
use App\Interface\Patients\PatientRepositoryInterface;

use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(SingleServieRepositoryInterface::class, SingleServieRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class, AmbulanceRepository::class);
        $this->app->bind(InsuranceRepositoryInterface::class, InsuranceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
