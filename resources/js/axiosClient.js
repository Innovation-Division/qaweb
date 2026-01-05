import axios from 'axios';

const axiosClient = axios.create({
  baseURL: window.location.origin,
});

axiosClient.interceptors.request.use((config) => {
  const token = localStorage.getItem('token');
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
});

axiosClient.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response?.status === 401) {
      console.warn('Unauthorized. Redirecting to login...');

      // ✅ Simple redirect without full reload
      if (window.location.pathname !== '/login') {
        window.history.pushState({}, '', '/login');
        window.dispatchEvent(new PopStateEvent('popstate'));
      }
    }

    return Promise.reject(error);
  }
);

export default axiosClient;
