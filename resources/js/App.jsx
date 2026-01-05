import { Route, Routes } from "react-router-dom";
import PresidentsCorner from "./pages/about/PresidentsCorner";
import CardDetails from "./components/PresidentsCorner/CardDetails";
import Domestic from "./pages/products/Domestic";
import { ToastContainer } from "react-toastify";
import EcommerceLayout from "./layouts/EcommerceLayout";
import EpartnerhubLayout from "./layouts/EpartnerhubLayout";
import Dashboard from "./pages/epartnerhub/Dashboard";
import Policies from "./pages/epartnerhub/Policies";
import Quotation from "./pages/epartnerhub/Quotation";
import ImportQuotation from "./pages/epartnerhub/ImportQuotation";
import Claims from "./pages/epartnerhub/Claims";
import Referral from "./pages/epartnerhub/Referral";
import Report from "./pages/epartnerhub/Report";
import Training from "./pages/epartnerhub/Training";
import Setting from "./pages/epartnerhub/Setting";
import MyDashboard from "./pages/epolicy/MyDashboard";
import MyPolicy from "./pages/epolicy/MyPolicy";
import MyClaims from "./pages/epolicy/MyClaims";
import MyReferral from "./pages/epolicy/MyReferral";
import MyPayments from "./pages/epolicy/MyPayments";
import MyAccount from "./pages/epolicy/MyAccount";
import AutoExcel from "./pages/epartnerhub/quotations/auto-excel/AutoExcel";
import OnlineClaims from "./pages/file-a-claim/OnlineClaims";
import ProductType from "./pages/file-a-claim/ProductType";
import MotorClaimsForm from "./pages/file-a-claim/MotorClaimsForm";
import SuccessPage from "./pages/file-a-claim/SuccessPage";
import PolicyDetails from "./pages/file-a-claim/PolicyDetails";
import PaymentSuccess from "./pages/products/PaymentSuccess";
import PendingPayment from "./pages/products/PendingPayment";
import ClaimsDetails from "./pages/epolicy/ClaimsDetails";
import CondoExcel from "./pages/products/CondoExcelPlus";
import QuotationSubmitted from "./pages/products/condo-excel-plus-page/QuotationSubmitted";

const App = () => {
    // const isEpartnerHub = useMatch("/epart/*");
  const isMd = window.innerWidth >= 768;

    return (
        <>
            <ToastContainer />
            <Routes>
                <Route
                    path="/ceos-viewpoint"
                    element={
                        <EcommerceLayout>
                            <PresidentsCorner />
                        </EcommerceLayout>
                    }
                />
                <Route
                    path="/ceos-viewpoint/:id"
                    element={
                        <EcommerceLayout>
                            <CardDetails />
                        </EcommerceLayout>
                    }
                />
                <Route
                    path="/get-quote/domestic-travel-plus"
                    element={
                        <EcommerceLayout>
                            <Domestic />
                        </EcommerceLayout>
                    }
                />
                <Route
                    path="/get-quote/payment/success/:product/:plan/:amount"
                    element={<PaymentSuccess />}
                />
                <Route
                    path="/get-quote/payment/pending/:email/:product"
                    element={<PendingPayment />}
                />



<Route
        path="/epolicy/claim/:id"
        element={
          isMd ? (
            <EpartnerhubLayout>
              <ClaimsDetails />
            </EpartnerhubLayout>
          ) : (
            <ClaimsDetails />
          )
        }
      />
              <Route
                    path="/policy-details"
                    element={
                        <EcommerceLayout>
                            <PolicyDetails />
                        </EcommerceLayout>
                    }
                />
                <Route
                    path="/online-claims"
                    element={
                        <EcommerceLayout>
                            <OnlineClaims />
                        </EcommerceLayout>
                    }
                />
                <Route
                    path="/product-type"
                    element={
                        <EcommerceLayout>
                            <ProductType />
                        </EcommerceLayout>
                    }
                />
                <Route
                    path="/motor-claims-form"
                    element={
                        <EcommerceLayout>
                            <MotorClaimsForm />
                        </EcommerceLayout>
                    }
                />
                 <Route
                    path="/success-page"
                    element={
                        <EcommerceLayout>
                            <SuccessPage />
                        </EcommerceLayout>
                    }
                />

                <Route
                    path="/get-quote/domestic-travel-plus"
                    element={
                        <EcommerceLayout>
                            <Domestic />
                        </EcommerceLayout>
                    }
                />

                <Route
                    path="/epartnerhub/dashboard"
                    element={
                        <EpartnerhubLayout>
                            <Dashboard />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epartnerhub/policies"
                    element={
                        <EpartnerhubLayout>
                            <Policies />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epartnerhub/quotations"
                    element={
                        <EpartnerhubLayout>
                            <Quotation />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epartnerhub/quotations/auto-excel"
                    element={
                        <EpartnerhubLayout>
                            <AutoExcel />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epartnerhub/import-quotation"
                    element={
                        <EpartnerhubLayout>
                            <ImportQuotation />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epartnerhub/claims"
                    element={
                        <EpartnerhubLayout>
                            <Claims />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epartnerhub/referrals"
                    element={
                        <EpartnerhubLayout>
                            <Referral />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epartnerhub/reports"
                    element={
                        <EpartnerhubLayout>
                            <Report />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epartnerhub/trainings"
                    element={
                        <EpartnerhubLayout>
                            <Training />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epartnerhub/settings"
                    element={
                        <EpartnerhubLayout>
                            <Setting />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epartnerhub/settings"
                    element={
                        <EpartnerhubLayout>
                            <Setting />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epolicy/dashboard"
                    element={
                        <EpartnerhubLayout>
                            <MyDashboard />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epolicy/policies"
                    element={
                        <EpartnerhubLayout>
                            <MyPolicy />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epolicy/claims"
                    element={
                        <EpartnerhubLayout>
                            <MyClaims />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epolicy/referrals"
                    element={
                        <EpartnerhubLayout>
                            <MyReferral />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epolicy/payments"
                    element={
                        <EpartnerhubLayout>
                            <MyPayments />
                        </EpartnerhubLayout>
                    }
                />
                <Route
                    path="/epolicy/accounts"
                    element={
                        <EpartnerhubLayout>
                            <MyAccount />
                        </EpartnerhubLayout>
                    }
                />
		   <Route
              path="/get-quote/condo-excel-plus"
              element={
                <EcommerceLayout>
                  <CondoExcel />
                </EcommerceLayout>
              }
            />
             <Route
              path="/get-quote/condo-excel-plus/quotation-submitted"
              element={
                <EcommerceLayout>
                  <QuotationSubmitted />
                </EcommerceLayout>
              }
            />
            </Routes>
        </>
    );
};

export default App;
