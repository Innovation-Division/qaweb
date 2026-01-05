import React, { useEffect } from 'react';
import Toast from "../../components/Toast.jsx";
import { useLocation } from "react-router-dom";
function SuccessToast() {
const location = useLocation();

  useEffect(() => {
    const params = new URLSearchParams(location.search);
    const status = params.get("status");

    //  console.log("status param:", status);
     
        if (status === "claim-success") {
        Toast(
  "Claim Submitted",
  <>
    <a
      href="/login"
      style={{ color: "#217B7E", fontSize: "16px", fontWeight: "700" }}
    >
      Sign in / login here
    </a>{" "}
    <span style={{ color: "#40444D", fontSize: "16px", fontWeight: "400" }}>
      to your ePartnerHub account to view status of your claim.
    </span>
  </>
);

        }
    }, [location.search]);

    return (
        <div>
            {/* your login page layout */}
        </div>
    );
};

export default SuccessToast