import React from 'react'
import Button from 'react-bootstrap/Button';
import Modal from 'react-bootstrap/Modal';
function Modal() {
  return (
    <Modal
      {...props}
      size="lg"
      aria-labelledby="contained-modal-title-vcenter"
      centered
    >
      <Modal.Header closeButton>
        <Modal.Title id="contained-modal-title-vcenter">
          Modal heading
        </Modal.Title>
      </Modal.Header>
      <Modal.Body>
        
        <svg width="58" height="51" viewBox="0 0 58 51" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M56.6258 41.7574L34.4217 3.19665C33.8668 2.25193 33.0747 1.46861 32.1238 0.924344C31.173 0.380075 30.0964 0.09375 29.0008 0.09375C27.9052 0.09375 26.8286 0.380075 25.8777 0.924344C24.9268 1.46861 24.1347 2.25193 23.5799 3.19665L1.37577 41.7574C0.841897 42.6712 0.560547 43.7104 0.560547 44.7687C0.560547 45.827 0.841897 46.8663 1.37577 47.78C1.92352 48.7305 2.71429 49.5181 3.66692 50.062C4.61956 50.6059 5.69975 50.8866 6.79667 50.8752H51.2049C52.3009 50.8857 53.3801 50.6046 54.3317 50.0607C55.2834 49.5168 56.0734 48.7297 56.6207 47.78C57.1553 46.8667 57.4376 45.8277 57.4385 44.7694C57.4394 43.7111 57.1589 42.6716 56.6258 41.7574ZM53.1041 45.7463C52.9105 46.0765 52.6326 46.3492 52.2989 46.5366C51.9651 46.724 51.5876 46.8193 51.2049 46.8127H6.79667C6.41397 46.8193 6.0364 46.724 5.70266 46.5366C5.36892 46.3492 5.09102 46.0765 4.89745 45.7463C4.72211 45.4494 4.62962 45.111 4.62962 44.7662C4.62962 44.4214 4.72211 44.083 4.89745 43.7861L27.1016 5.22536C27.299 4.89674 27.5782 4.62481 27.9119 4.43602C28.2456 4.24724 28.6225 4.14802 29.0058 4.14802C29.3892 4.14802 29.7661 4.24724 30.0998 4.43602C30.4335 4.62481 30.7127 4.89674 30.9101 5.22536L53.1142 43.7861C53.288 44.0839 53.3788 44.4228 53.377 44.7676C53.3752 45.1123 53.281 45.4503 53.1041 45.7463ZM26.9695 30.5627V20.4064C26.9695 19.8677 27.1835 19.351 27.5645 18.9701C27.9454 18.5892 28.462 18.3752 29.0008 18.3752C29.5395 18.3752 30.0561 18.5892 30.4371 18.9701C30.818 19.351 31.032 19.8677 31.032 20.4064V30.5627C31.032 31.1014 30.818 31.618 30.4371 31.999C30.0561 32.3799 29.5395 32.5939 29.0008 32.5939C28.462 32.5939 27.9454 32.3799 27.5645 31.999C27.1835 31.618 26.9695 31.1014 26.9695 30.5627ZM32.0476 39.7033C32.0476 40.3059 31.8689 40.895 31.5342 41.396C31.1994 41.8971 30.7235 42.2876 30.1668 42.5182C29.61 42.7488 28.9974 42.8092 28.4064 42.6916C27.8153 42.5741 27.2724 42.2839 26.8463 41.8578C26.4202 41.4316 26.13 40.8887 26.0124 40.2977C25.8949 39.7067 25.9552 39.094 26.1858 38.5373C26.4164 37.9806 26.807 37.5047 27.308 37.1699C27.8091 36.8351 28.3982 36.6564 29.0008 36.6564C29.8089 36.6564 30.5838 36.9774 31.1552 37.5488C31.7266 38.1202 32.0476 38.8952 32.0476 39.7033Z" fill="#DC6803"/>
</svg>

        <p className='font-bold text-[27px] text-[#2D2727]'>
          Submit Claim
        </p>
        <p className='font-bold text-base text-[#585858]'>
          By submitting this claim, you acknowledge that <br> </br>you have reviewed the information in the claim <br> </br>form
        </p>
         <button className="bg-[#E4509A] text-[#FFFEFE] rounded-full p-4">
                Submit Claim
            </button>
             <button className="bg-[#E4509A] text-[#FFFEFE] rounded-full p-4">
                Cancel
            </button>
      </Modal.Body>
      <Modal.Footer>
        <Button onClick={props.onHide}>Close</Button>
      </Modal.Footer>
    </Modal>
  )
}
function App() {
  const [modalShow, setModalShow] = React.useState(false);

  return (
    <>
      <Button variant="primary" onClick={() => setModalShow(true)}>
        Launch vertically centered modal
      </Button>

      <MyVerticallyCenteredModal
        show={modalShow}
        onHide={() => setModalShow(false)}
      />
    </>
  );
}

render(<App />);
export default Modal