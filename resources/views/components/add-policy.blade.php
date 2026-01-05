<style>
    .add-policy-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
    }

    .policy-container {
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
    }

    .policy-input {
        color: var(--Surfaces-LVL-9, #1E1F21);
        font-family: Inter;
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
        padding: 8px 12px;
        border: none;
        border-radius: 1px;
        border-bottom: 1px solid #006666;
        flex-grow: 1;
        outline: none;
        width: 100%;
        background-color: transparent;
    }

    .policy-input:focus {
        outline: none !important;
        box-shadow: none !important;
    }

    .action-container {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .icon-delete,
    .icon-add {
        width: 39px;
        height: 39px;
        cursor: pointer;
    }

    .required {
        color: var(--Status-Danger, #DD0707);
        font-family: Inter;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .label-text {
        color: var(--Surfaces-LVL-5, #848A90);
        font-family: Inter;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .add-policy-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
    }

    .policy-container {
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
    }

    .policy-input {
        color: var(--Surfaces-LVL-9, #1E1F21);
        font-family: Inter;
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
        padding: 8px 12px;
        border: none;
        border-radius: 1px;
        border-bottom: 1px solid var(--Teal-LVL-9, #066);
        flex-grow: 1;
        outline: none;
        width: 100%;
        /* Set width to 100% */
    }

    .policy-input:focus {
        color: var(--Surfaces-LVL-9, #1E1F21);
        font-family: Inter;
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
        padding: 8px 12px;
        border: none;
        border-radius: 1px;
        border-bottom: 1px solid var(--Teal-LVL-9, #066);
        flex-grow: 1;
        outline: none;
        width: 100%;
        /* Set width to 100% */
    }

    .action-container {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .icon-delete,
    .icon-add {
        width: 39px;
        height: 39px;
        cursor: pointer;
    }
</style>

    <div class="add-policy-container" id="policy-container">
        <!-- Initial 1 policy -->
        <div class="policy-component" id="policy-1">
            <div class="label-container">
                <span class="label-text">
                    Policy No. 1
                    <span class="required">*</span>
                </span>
            </div>

            <div class="policy-container">
                <input type="text" class="policy-input" id="policyOne" name="policy[1]"
                    placeholder="XX-XXX-XX-00-0000000-00" />
                <div class="action-container">
                   
                    <img src="{{ asset('assets/icons/Icon-Add.svg') }}" class="icon-add" onclick="addPolicy()" />
                </div>
            </div>
        </div>
    </div>

    <script>
        let policyCount = 1; // Start with one policy already added

        // Function to add a new policy component
        function addPolicy() {
            if (policyCount >= 3) return; // Limit the number of policies to 3, ignore further adds

            // Increment policy count
            policyCount++;

            // Create a new policy element from scratch
            const policyContainer = document.getElementById("policy-container");

            const newPolicy = document.createElement('div');
            newPolicy.classList.add("policy-component");
            newPolicy.id = `policy-${policyCount}`;

            // Add label container
            const labelContainer = document.createElement('div');
            labelContainer.classList.add("label-container");

            const labelText = document.createElement('span');
            labelText.classList.add("label-text");
            labelText.textContent = `Policy No. ${policyCount}`;
            labelText.innerHTML += '<span class="required">*</span>';

            labelContainer.appendChild(labelText);
            newPolicy.appendChild(labelContainer);

            // Add policy input container
            const policyInputContainer = document.createElement('div');
            policyInputContainer.classList.add("policy-container");

            const input = document.createElement('input');
            input.type = "text";
            input.classList.add("policy-input");
            input.id = `policy${policyCount === 1 ? 'One' : policyCount === 2 ? 'Two' : 'Three'}`;
            input.name = `policy[${policyCount}]`; // For backend processing
            input.placeholder = "XX-XXX-XX-00-0000000-00";
            // input.required = true;

            // Add auto-formatting logic to the new input
            input.addEventListener('input', function(e) {
                autoFormatPolicyNumber(e.target);
            });

            const actionContainer = document.createElement('div');
            actionContainer.classList.add("action-container");

            const deleteIcon = document.createElement('img');
            deleteIcon.src = "{{ asset('assets/icons/Icon-Delete.svg') }}";
            deleteIcon.classList.add("icon-delete");
            deleteIcon.onclick = () => deletePolicy(policyCount);

            const addIcon = document.createElement('img');
            addIcon.src = "{{ asset('assets/icons/Icon-Add.svg') }}";
            addIcon.classList.add("icon-add");
            addIcon.onclick = addPolicy;

            actionContainer.appendChild(deleteIcon);
            actionContainer.appendChild(addIcon);

            policyInputContainer.appendChild(input);
            policyInputContainer.appendChild(actionContainer);
            newPolicy.appendChild(policyInputContainer);

            // Append the new policy to the container
            policyContainer.appendChild(newPolicy);
        }

        // Function to delete a policy
        function deletePolicy(policyId) {
            if (policyCount <= 1) return; // Ensure there's a minimum of 1 policy

            // Decrement policy count
            policyCount--;

            // Find and remove the policy by ID
            const policyToDelete = document.getElementById(`policy-${policyId}`);
            policyToDelete.remove();

            // Renumber the remaining policies to keep the sequence intact
            const policies = document.querySelectorAll(".policy-component");
            policies.forEach((policy, index) => {
                const newPolicyId = index + 1; // Update the policyId starting from 1
                policy.id = `policy-${newPolicyId}`;

                const label = policy.querySelector(".label-text");
                label.textContent = `Policy No. ${newPolicyId}`;

                const input = policy.querySelector(".policy-input");
                input.id = `policy${newPolicyId === 1 ? 'One' : newPolicyId === 2 ? 'Two' : 'Three'}`;
                input.name = `policy[${newPolicyId}]`;
                // input.required = true;

                const deleteIcon = policy.querySelector(".icon-delete");
                deleteIcon.onclick = () => deletePolicy(newPolicyId);

                const addIcon = policy.querySelector(".icon-add");
                addIcon.onclick = addPolicy;
            });

            // Ensure the first policy is always required
            const firstPolicyInput = document.querySelector(".policy-component:first-child .policy-input");
            if (firstPolicyInput) {
                // firstPolicyInput.required = true;
            }
        }

        // Auto-format policy number
        function autoFormatPolicyNumberOLD(input) {
            let rawValue = input.value;

            // Preserve a hyphen that was just typed at the end
            let endsWithHyphen = rawValue.endsWith('-');

            // Remove hyphens for processing
            let value = rawValue.replace(/-/g, '');

            // Ensure letters are uppercase
            value = value.toUpperCase();

            // Extract parts
            let mc = value.slice(0, 2).replace(/[^A-Z]/g, ''); // First 2 letters (MC)
            let mnc = value.slice(2, 5).replace(/[^A-Z]/g, ''); // Next 3 letters (MNC)
            let ho = value.slice(5, 7).replace(/[^A-Z]/g, ''); // Next 2 letters (HO)

            // Extract numeric parts
            let numericPart = value.slice(7).replace(/\D/g, '');

            // Count hyphens to determine structure
            let hyphenPositions = [];
            for (let i = 0; i < rawValue.length; i++) {
                if (rawValue[i] === '-') {
                    hyphenPositions.push(i);
                }
            }

            // Check if the user has manually typed a hyphen after the first number
            let manualHyphenAfterFirstNumber = hyphenPositions.length === 4;

            // First number and second number handling
            let firstNumber = '';
            let secondNumber = '';

            if (manualHyphenAfterFirstNumber) {
                // If there's a manual hyphen after the first number, split the numeric part
                let parts = rawValue.split('-');
                let firstNumberDigits = parts[3]?.replace(/\D/g, '') || '';
                secondNumber = parts[4]?.replace(/\D/g, '').slice(0, 2) || '';

                // First number is always fixed at 7 digits with RIGHT alignment
                firstNumber = firstNumberDigits.slice(-7).padStart(7, '0');
            } else {
                // No second number, all numeric digits go to first number
                // First number is always fixed at 7 digits with RIGHT alignment
                firstNumber = numericPart.slice(-7).padStart(7, '0');
            }

            // Construct formatted output
            let formattedValue = mc;
            if (mc.length === 2) {
                if (mnc.length > 0) formattedValue += `-${mnc}`;
                if (mnc.length === 3 && ho.length > 0) formattedValue += `-${ho}`;

                // Add first number if HO is complete
                if (ho.length === 2) {
                    // Always show the first number with leading zeros if any digit was typed
                    if (numericPart.length > 0) {
                        formattedValue += `-${firstNumber}`;

                        // Add second number if it exists
                        if (secondNumber.length > 0) {
                            formattedValue += `-${secondNumber}`;
                        }
                    }
                }
            }

            // Special case: If user just typed a hyphen after first number, preserve it
            if (endsWithHyphen && hyphenPositions.length === 4) {
                formattedValue += '-';
            }

            // Update the input value
            input.value = formattedValue;
        }

        function autoFormatPolicyNumber(input) {
            let value = input.value.toUpperCase(); // Convert to uppercase for letters
            let cleanValue = value.replace(/[^A-Z0-9]/g, ""); // Remove all hyphens initially

            // Ensure correct format
            console.log(cleanValue.length);
            if (cleanValue.length >= 2) {
                value = cleanValue.substring(0, 2) +
                    (cleanValue.length > 2 ? "-" + cleanValue.substring(2, 5) : "-") +
                    (cleanValue.length > 4 ? "-" + cleanValue.substring(5, 7) : "") +
                    (cleanValue.length > 6 ? "-" + cleanValue.substring(7, 9) : "") +
                    (cleanValue.length > 8 ? "-" + cleanValue.substring(9, 16) : ""); // Add last 7 digits
                // (cleanValue.length > 15 ? "-" + cleanValue.substring(16, 18) : "-00"); // Last NN

                if (cleanValue.length > 16) {
                    value += "-" + cleanValue.substring(16, 18); // Last 2 digits
                }
            }

            // Detect when the user types "-" at length 13
            input.addEventListener("keydown", function(event) {
                if (event.key === "-" && cleanValue.length === 10) {
                    // Format the last part (7-digit number)
                    let lastDigits = "0000000"; // Default padded value
                    input.addEventListener("input", function() {
                        let numPart = input.value.split("-").pop().replace(/[^0-9]/g,
                        ""); // Extract only numbers

                        if (numPart.length > 0) {
                            lastDigits = numPart.padStart(7, "0"); // Pad to 7 digits
                        }

                        // Update the full formatted value
                        let parts = value.split("-");
                        parts[4] = lastDigits;
                        input.value = parts.join("-") + "" + "-";
                        // input.value = joined +"" + "-";
                        console.log(input.value);
                    }, {
                        once: true
                    }); // Ensure it runs only once
                }
            });
            // Allow hyphen manually ONLY when the cleaned value reaches 13 characters
            if (cleanValue.length === 13 && value.length < 22) {
                //value += "-";
            }

            // Limit input to final format LL-LLL-LL-NN-NNNNNNN- (22 characters including hyphens)
            if (value.length > 30) {
                value = value.substring(0, 30);
            }

            input.value = value;
        }







        // Attach event listener to the input field
        document.getElementById('policyOne').addEventListener('input', function(e) {
            autoFormatPolicyNumber(e.target);
        });
    </script>
