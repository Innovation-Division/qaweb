import React, { useState } from 'react';

function Accordion({ title, children }) {
  const [isOpen, setIsOpen] = useState(true);
  return (
   <div className="mb-9 border-none overflow-visible z-10 md:mt-11 mt-2">
  <div
    className="bg-[#F0F4F9]  py-6 cursor-pointer relative md:text-center text-start"
    onClick={() => setIsOpen(!isOpen)}
  >
    <p className="md:text-[23px] text-lg text-[#2D2727] font-medium md:ml-0 ml-4">
      {title}
    </p>
    <span className="absolute md:right-8 right-5 top-1/2 -translate-y-1/2 text-2xl text-[#217B7E] ">
      {isOpen ? "—" : "+"}
    </span>
  </div>

  {isOpen && <div className="bg-white  py-6">{children}</div>}
</div>
  )
}

export default Accordion