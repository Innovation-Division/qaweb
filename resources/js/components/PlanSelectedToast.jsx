import { toast } from "react-toastify"; // Assuming you're using Heroicons
import "react-toastify/dist/ReactToastify.css";

const showProPlanConfirmation = (plan, price) => {
    const PlanSelectedToast = ({ closeToast }) => (
        <div className="flex gap-3">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-info-circle-fill"
                viewBox="0 0 16 16"
            >
                <path
                    fill="#1465B4"
                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"
                />
            </svg>
            <div className="flex flex-col w-full">
                <p className="font-bold text-[#1D1F23]">
                    You selected <span className="capitalize">{plan}</span> Plan
                </p>
                <p className="font-medium text-[#40444D]">
                    You have selected <span className="capitalize">{plan}</span>{" "}
                    Plan with amount ₱{price}.
                </p>
            </div>
            <button onClick={closeToast} className="self-start">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="28"
                    height="28"
                    fill="currentColor"
                    class="bi bi-x"
                    viewBox="0 0 16 16"
                >
                    <path
                        fill="#848A90"
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"
                    />
                </svg>
            </button>
        </div>
    );

    toast(PlanSelectedToast, {
        autoClose: 8000,
        className: "!w-[400px] md:!w-[450px] border !p-3",
        closeButton: false,
    });
};

export { showProPlanConfirmation };
