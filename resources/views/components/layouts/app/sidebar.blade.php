<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        {{-- <flux:sidebar sticky collapsible="mobile" class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.header>
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                <flux:sidebar.collapse class="lg:hidden" />
            </flux:sidebar.header>

            <flux:sidebar.nav>
                <flux:sidebar.group :heading="__('Platform')" class="grid">
                    <flux:sidebar.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:sidebar.item>
                </flux:sidebar.group>
            </flux:sidebar.nav>

            <flux:spacer />
            <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        </flux:sidebar> --}}

        <flux:sidebar sticky collapsible="mobile"
    class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">

    {{-- Header --}}
    <flux:sidebar.header>
        <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
        <flux:sidebar.collapse class="lg:hidden" />
    </flux:sidebar.header>

    {{-- Navigation --}}
    <flux:sidebar.nav>

        {{-- Dashboard --}}
        <flux:sidebar.group class="grid">
            <flux:sidebar.item
                icon="home"
                :href="route('dashboard')"
                :current="request()->routeIs('dashboard')"
                wire:navigate>
                Dashboard
            </flux:sidebar.item>
        </flux:sidebar.group>

        {{-- Gestión de Personas --}}
        <flux:sidebar.group heading="Gestión de Personas" collapsible>
            <flux:sidebar.item icon="users" href="#">
                Usuarios
            </flux:sidebar.item>

            <flux:sidebar.item icon="scissors" href="#">
                Barberos
            </flux:sidebar.item>

            <flux:sidebar.item icon="user" href="#">
                Clientes
            </flux:sidebar.item>
        </flux:sidebar.group>

        {{-- Gestión de Barbería --}}
        <flux:sidebar.group heading="Gestión de Barbería" collapsible>
            <flux:sidebar.item icon="briefcase" href="#">
                Servicios
            </flux:sidebar.item>

            <flux:sidebar.item icon="clock" href="#">
                Horarios de Barberos
            </flux:sidebar.item>

            <flux:sidebar.item icon="no-symbol" href="#">
                Bloqueos de Barberos
            </flux:sidebar.item>
        </flux:sidebar.group>

        {{-- Gestión de Citas --}}
        <flux:sidebar.group heading="Gestión de Citas" collapsible>
            <flux:sidebar.item icon="calendar" href="#">
                Citas
            </flux:sidebar.item>

            <flux:sidebar.item icon="calendar-days" href="#">
                Calendario
            </flux:sidebar.item>

            <flux:sidebar.item icon="clock" href="#">
                Historial
            </flux:sidebar.item>

            <flux:sidebar.item icon="x-circle" href="#">
                Canceladas / No Asistidas
            </flux:sidebar.item>
        </flux:sidebar.group>

        {{-- Gestión Comercial --}}
        <flux:sidebar.group heading="Gestión Comercial" collapsible>
            <flux:sidebar.item icon="credit-card" href="#">
                Pagos
            </flux:sidebar.item>

            <flux:sidebar.item icon="wallet" href="#">
                Métodos de Pago
            </flux:sidebar.item>

            <flux:sidebar.item icon="chart-bar" href="#">
                Reportes
            </flux:sidebar.item>
        </flux:sidebar.group>

        {{-- Reportes --}}
        <flux:sidebar.group heading="Reportes" collapsible>
            <flux:sidebar.item icon="user-circle" href="#">
                Por Barbero
            </flux:sidebar.item>

            <flux:sidebar.item icon="scissors" href="#">
                Por Servicio
            </flux:sidebar.item>

            <flux:sidebar.item icon="currency-dollar" href="#">
                Ingresos
            </flux:sidebar.item>

            <flux:sidebar.item icon="star" href="#">
                Clientes Frecuentes
            </flux:sidebar.item>
        </flux:sidebar.group>

        {{-- Configuración --}}
        <flux:sidebar.group heading="Configuración" collapsible>
            <flux:sidebar.item icon="clock" href="#">
                Horarios Generales
            </flux:sidebar.item>

            <flux:sidebar.item icon="cog-6-tooth" href="#">
                Estados de Citas
            </flux:sidebar.item>

            <flux:sidebar.item icon="lock-closed" href="#">
                Roles y Permisos
            </flux:sidebar.item>

            <flux:sidebar.item icon="building-storefront" href="#">
                Datos de la Barbería
            </flux:sidebar.item>
        </flux:sidebar.group>

    </flux:sidebar.nav>

    <flux:spacer />

    <x-desktop-user-menu
        class="hidden lg:block"
        :name="auth()->user()->name" />

</flux:sidebar>


        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <flux:avatar
                                    :name="auth()->user()->name"
                                    :initials="auth()->user()->initials()"
                                />

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                    <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer"
                            data-test="logout-button"
                        >
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
