import React from "react";
import Navbar from "../components/Navbar";
import Footer from "../components/Footer";

const EcommerceLayout = ({ children }) => {
    return (
        <div className="bg-white w-full min-h-screen">
            <Navbar />
            {children}
            <Footer />
        </div>
    );
};

export default EcommerceLayout;
