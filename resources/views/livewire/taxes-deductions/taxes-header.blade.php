<nav style="--bs-breadcrumb-divider: '>';font-size:14px;" aria-label="breadcrumb">
    <ol class="breadcrumb cs-breadcrumbs">
        <li wire:click="$emit('moveToTab',1)" class="breadcrumb-item mr-3 {{ $currentStep == 1 ? 'section-active' : '' }}">
            <a class="light-grey" href="/tax-filing"> Deductions</a></li>

        <li wire:click="$emit('moveToTab',2)" class="breadcrumb-item mr-3 {{ $currentStep == 2 ? 'section-active' : '' }}">
            <a class="light-grey" href="/estimate-payments"> Estimate and Other Payments</a></li>

        <li wire:click="$emit('moveToTab',3)" class="breadcrumb-item mr-3 {{ $currentStep == 3 ? 'section-active' : '' }}">
            <a class="light-grey" href="/stimulus"> Stimulus</a></li>

        <li wire:click="$emit('moveToTab',4)" class="breadcrumb-item mr-3 {{ $currentStep == 4 ? 'section-active' : '' }}">
            <a class="light-grey" href="/advanced-child-tax-credit-payments-received"> Advanced child tax credit payments received </a></li>
    </ol>
</nav>