import React from 'react';
import PropTypes from 'prop-types';

import Sidebar from '../../components/Sidebar';
import Footer from '../../components/Footer';

import styles from './Base.module.scss';

// Import global styles.
import '../../styles/globals.scss';

const BaseLayout = ({ children, headline }) => (
  <div className={styles.layout}>
    <Sidebar />

    <main className={styles.layout__main}>
      {headline && <h1 className={`headline ${styles.headline}`}>{headline}</h1>}

      <div className={styles.body}>{children}</div>

      <Footer className={styles.mobileFooter} />
    </main>
  </div>
);

BaseLayout.propTypes = {
  children: PropTypes.node.isRequired,
  headline: PropTypes.string,
};

export default BaseLayout;
