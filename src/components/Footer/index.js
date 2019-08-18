import React from 'react';
import PropTypes from 'prop-types';

import styles from './Footer.module.scss';

const Footer = ({ className }) => (
  <footer className={className}>
    <p className={styles.copyright}>&copy; {new Date().getFullYear()} Nick Braica</p>

    <ul className={styles.social}>
      <li>
        <a href="https://github.com/braican" target="_blank" rel="noopener noreferrer">
          GitHub
        </a>
      </li>
      <li>
        <a href="https://www.instagram.com/braican/" target="_blank" rel="noopener noreferrer">
          Instagram
        </a>
      </li>
      <li>
        <a href="https://untappd.com/user/braican" target="_blank" rel="noopener noreferrer">
          Untappd
        </a>
      </li>
    </ul>
  </footer>
);

Footer.propTypes = {
  className: PropTypes.string,
};

export default Footer;
