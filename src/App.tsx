import { BrowserRouter, Routes, Route } from 'react-router';
import Layout from '@/components/Layout';
import Home from '@/pages/Home';
import RegionPage from '@/pages/RegionPage';
import PlaceDetailPage from '@/pages/PlaceDetailPage';
import TourDetailPage from '@/pages/TourDetailPage';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route element={<Layout />}>
          <Route index element={<Home />} />
          <Route path="destinations/:slug" element={<RegionPage />} />
          <Route path="destinations/:slug/:placeSlug" element={<PlaceDetailPage />} />
          <Route path="tours/:slug" element={<TourDetailPage />} />
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
