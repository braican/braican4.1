import React from 'react';
import PropTypes from 'prop-types';
import { graphql } from 'gatsby';

import Layout from '../layouts/Base';
import SEO from '../components/Seo';
import Intro from '../components/Intro';

const IndexPage = ({ data }) => {
  const { lead, main } = data.wordpressBraicanFront;

  return (
    <Layout>
      <SEO title="Home" />
      <Intro headline={lead} body={main} />
    </Layout>
  );
};

IndexPage.propTypes = {
  data: PropTypes.shape({
    wordpressBraicanFront: PropTypes.shape({
      lead: PropTypes.string,
      main: PropTypes.string,
    }),
  }),
};

export const query = graphql`
  query FrontPageQuery {
    wordpressBraicanFront {
      lead
      main
    }
  }
`;

export default IndexPage;
