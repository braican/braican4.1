import React from 'react';

import Layout from '../layouts/Base';
import SEO from '../components/Seo';

const NotFoundPage = () => (
  <Layout>
    <SEO title="404: Not found" />
    <h1>404</h1>
    <p>Sorry, there's nothing here.</p>
  </Layout>
);

export default NotFoundPage;
