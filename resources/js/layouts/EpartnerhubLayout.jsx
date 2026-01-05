import React from "react";
import DashboardHeader from "../components/DashboardHeader";
import DashboardFooter from "../components/DashboardFooter";
import Sidebar from "../components/Sidebar";

const EpartnerhubLayout = ({ children }) => {
    return (
        <div className="flex flex-col bg-[#F7FCFF] w-full min-h-screen">
            <DashboardHeader />
            <div className="flex w-full min-h-[calc(90vh-80px)]">
                <Sidebar />
                <div className="w-full">{children}</div>
            </div>
            <DashboardFooter />
        </div>
    );
};

export default EpartnerhubLayout;
