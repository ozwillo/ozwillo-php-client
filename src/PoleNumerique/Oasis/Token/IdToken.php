<?php
/**
 * oasis-php-integration - PHP library for accessing the OASIS service.
 * Copyright (C) 2014 Atol Conseils et Développements
 *
 * This file is part of oasis-php-integration.
 *
 * oasis-php-integration is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * oasis-php-integration is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace PoleNumerique\Oasis\Token;

use PoleNumerique\Oasis\Tools\Jwt;

class IdToken extends Jwt
{
    private $encoded;

    public function __construct($claimset, $encoded)
    {
        parent::__construct($claimset);

        $this->encoded = $encoded;
    }

    public function isAppAdmin()
    {
        return boolval($this->getClaim(IdTokenClaims::APP_ADMIN));
    }

    public function isAppUser()
    {
        return boolval($this->getClaim(IdTokenClaims::APP_USER));
    }

    public function getAuthorizationTime()
    {
        return $this->getClaim(IdTokenClaims::AUTHORIZATION_TIME);
    }

    public function getAuthorizedParty()
    {
        return $this->getClaim(IdTokenClaims::AUTHORIZED_PARTY);
    }

    /**
     * @return string Encoded ID Token
     */
    public function getEncoded()
    {
        return $this->encoded;
    }

    public function getNonce()
    {
        return $this->getClaim(IdTokenClaims::NONCE);
    }
}