import React from 'react';
import PropTypes from 'prop-types';

import Sidebar from '../../components/Sidebar';
import Footer from '../../components/Footer';

import styles from './Base.module.scss';

// Import global styles.
import '../../styles/globals.scss';

const BaseLayout = ({ children }) => (
  <div className={styles.layout}>
    <Sidebar />

    <main className={styles.layout__main}>
      {children}

      <Footer className={styles.mobileFooter} />
    </main>
  </div>
);

BaseLayout.propTypes = {
  children: PropTypes.node.isRequired,
};

export default BaseLayout;
