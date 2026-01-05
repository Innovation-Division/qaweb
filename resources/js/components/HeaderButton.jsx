import React from "react";

const HeaderButton = ({ title, onHandleClick }) => {
    return (
        <button
            className="px-10 py-2 text-white bg-[#013353] rounded-md hidden md:block"
            onClick={onHandleClick}
        >
            {title}
        </button>
    );
};

export default HeaderButton;
