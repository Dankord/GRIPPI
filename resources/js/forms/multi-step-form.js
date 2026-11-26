console.log("GRIPPI Multi-step form loaded");

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('crime-form');

    if (!form) return;

    const steps = form.querySelectorAll('[data-step]');
    const progressSegments = form.querySelectorAll('.progress-segment');

    const previousButton = document.getElementById('previous-step');
    const nextButton = document.getElementById('next-step');
    const submitButton = document.getElementById('submit-form');

    const previousLabel = document.getElementById('previous-label');
    const nextLabel = document.getElementById('next-label');
    let isSubmitting = false;

    let currentStep = 0;

    function updateForm() {
    steps.forEach((step, index) => {
        step.hidden = index !== currentStep;
    });

    progressSegments.forEach((segment, index) => {
        segment.classList.toggle('active', index <= currentStep);
    });

    // Button states
    previousButton.disabled = currentStep === 0;

    nextButton.hidden = currentStep === steps.length - 1;
    submitButton.hidden = currentStep !== steps.length - 1;

    // Dynamic button labels
    const stepNames = [
        'Information',
        'Classification',
        'Location'
    ];

    previousLabel.textContent = stepNames[currentStep - 1] ?? '';
    nextLabel.textContent = stepNames[currentStep + 1] ?? '';
}

    // Validate current step before proceeding to the next!
    function validateCurrentStep() {

        const currentSection = steps[currentStep];

        const inputs = currentSection.querySelectorAll(
            'input, select, textarea'
        );

        for (const input of inputs) {
            if (!input.checkValidity()) {
                input.reportValidity();
                return false;
            }
        }
        return true;
    }

    // Next page
    nextButton.addEventListener('click', () => {
        if (!validateCurrentStep()) return;

        if (currentStep < steps.length - 1) {
            currentStep++;
            updateForm();
        }
    });

    // Previous page
    previousButton.addEventListener('click', () => {
        if (currentStep > 0) {
            currentStep--;
            updateForm();
        }
    });

    // Final validation before submission
    form.addEventListener('submit', (event) => {
        //prevent duplicated submission
        if(isSubmitting) {
            event.preventDefault();
            return
        }
        //validate before submitting
        if (!form.checkValidity()) {
            event.preventDefault();

            const invalidInput = form.querySelector(':invalid');

            if (invalidInput) {
                const invalidStep = invalidInput.closest('[data-step]');

                if (invalidStep) {
                    currentStep = Number(invalidStep.dataset.step);
                    updateForm();

                    requestAnimationFrame(() => {
                    invalidInput.focus();
                    invalidInput.reportValidity();
                    });
                }
            }
            return;
        }
        isSubmitting = true;

        submitButton.disabled = true;
        submitButton.textContent = 'Submitting...';
    });

    updateForm();
});