import React from 'react';
import PropTypes from 'prop-types';

import styles from './Intro.module.scss';

const Intro = ({ headline, body }) => (
  <div className={styles.intro}>
    <h1 className="headline">{headline}</h1>

    <div className="stack" dangerouslySetInnerHTML={{ __html: body }}></div>
  </div>
);

Intro.propTypes = {
  headline: PropTypes.string,
  body: PropTypes.string,
};

export default Intro;
